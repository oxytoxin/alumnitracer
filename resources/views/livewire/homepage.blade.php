<div>
    @foreach ($profiles as $profile)
        <div>
            {{ $profile->full_name }}
        </div>
    @endforeach
    {{ $profiles->links() }}
</div>
