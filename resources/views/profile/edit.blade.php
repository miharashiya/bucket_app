<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>



            <!-- 他のユーザーのTodoリストへのリンク -->
            @php
                $users = $users ?? collect(); // 未定義の場合は空のコレクションを代入
            @endphp
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="font-semibold text-lg">他のユーザーのTodoリストを見る</h2>
                @if (isset($users) && $users->isEmpty())
                    <p>他のユーザーがいません。</p>
                @else
                    <ul class="mt-2">
                        @foreach ($users as $user)
                            <li>
                                <a href="{{ route('users.list-items', $user->id) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $user->name }}のTodoリスト
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
