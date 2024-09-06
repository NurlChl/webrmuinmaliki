<div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 0)">
    <div x-show="loading" class="fixed inset-0 flex items-center justify-center bg-white z-50">
        <div class="loader"></div>
    </div>
</div>