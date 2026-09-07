import $ from 'jquery';
import Swal from 'sweetalert2';
import notificationsTypes from './notificationsTypes';

export const RockToast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 5000,
	timerProgressBar: true,
	background: '#1E2430',
	color: '#E8E8E6',
	showCloseButton: true,
	customClass: {
		popup: 'rockton-toast',
		timerProgressBar: 'rockton-toast-bar',
	},
});

export async function RockConfirm({
	title = 'Excluir esta música?',
	text = 'Essa ação não pode ser desfeita.',
} = {}) {
	const result = await Swal.fire({
		icon: 'question',
		title,
		text,
		background: '#1E2430',
		color: '#E8E8E6',
		showCancelButton: true,
		confirmButtonText: 'Sim, excluir',
		cancelButtonText: 'Cancelar',
		confirmButtonColor: '#378ADD',
		cancelButtonColor: 'transparent',
		customClass: {
			popup: 'rockton-modal',
			cancelButton: 'rockton-btn-ghost',
		},
	});

	return result.isConfirmed;
}

function showSessionNotifications() {
	$('[data-notification]').each(function () {
		const notification = $(this);
		const type = notification.data('notification-type');
		const config = notificationsTypes[type] || notificationsTypes.info;

		RockToast.fire({
			icon: config.icon,
			title: config.title,
			text: notification.data('notification-message'),
		});
	});
}

window.RockToast = RockToast;
window.RockConfirm = RockConfirm;

$(showSessionNotifications);
