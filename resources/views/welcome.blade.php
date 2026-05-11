<x-layout>
    @if (count($tasks))
    <p>Yes, we have some tasks. Hpw many? <?= count($tasks) ?> tasks, in fact!</p>
    @endif

    @foreach ($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach

    @unless (count($tasks))
        <p>There are no active tasks.</p>
    @endunless

    @forelse ($tasks as $task)
        <li>{{ $task }}</li>
    @empty
        <p>There are no active tasks.</p>
    @endforelse
</x-layout>
