<style>
    .loading-overlay {
        display: none;
    }
    .loading-overlay.active {
        display: flex;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>
<div id="loading" style="position: fixed; inset: 0; z-index: 9999; background: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center;">
    <div style="width: 50px; height: 50px; border: 4px solid white; border-top: 4px solid transparent; border-radius: 50%; animation: spin 1s linear infinite;"></div>
</div>