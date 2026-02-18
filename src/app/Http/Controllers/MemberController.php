<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('name', 'asc')->paginate(10);
        return view('dashboard.member.index', compact('members'));
    }

    public function create()
    {
        return view('dashboard.member.create');
    }

    public function store(MemberRequest $request)
    {
        try {
            $data = $request->validated();
            $photoPath = null;
            $coverPath = null;

            $destinationMember = public_path('imagens/members/photo');
            if (!file_exists($destinationMember)) {
                mkdir($destinationMember, 0755, true);
            }

            $destinationCover = public_path('imagens/members/cover');
            if (!file_exists($destinationCover)) {
                mkdir($destinationCover, 0755, true);
            }

            // Upload da FOTO
            if ($request->hasFile('photo')) {
                $photoName = uniqid('photo_') . '.' . $request->file('photo')->extension();
                $request->file('photo')->move($destinationMember, $photoName);
                $photoPath = 'imagens/members/photo/' . $photoName;
            }

            // Upload da CAPA
            if ($request->hasFile('cover')) {
                $coverName = uniqid('cover_') . '.' . $request->file('cover')->extension();
                $request->file('cover')->move($destinationCover, $coverName);
                $coverPath = 'imagens/members/cover/' . $coverName;
            }

            Member::create([
                'name'        => $data['name'],
                'photo'       => $photoPath,
                'cover'       => $coverPath,
                'status'      => $data['status'],
                'description' => !!$data['description'] ? $data['description'] : null,
            ]);
            return back()->with('success', 'Músico adicionado com sucesso!');

        } catch (\Exception $e) {
            if (isset($photoPath) && file_exists(public_path($photoPath))) {
                unlink(public_path($photoPath));
            }
            if (isset($coverPath) && file_exists(public_path($coverPath))) {
                unlink(public_path($coverPath));
            }
            return back()->withInput()->with('error', 'Erro ao criar músico. Tente novamente.');
        }
    }
}