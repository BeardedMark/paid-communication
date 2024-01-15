@php
    $user = Auth::user();
    $title = 'Редактирование профиля ' . $user->name;
@endphp

@extends('layouts.app')
@section('title', $title)
@section('description', $title)

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-3">
                    <div class="frame fib fib-col fib-21">

                        <div class="fib fib-col fib-13">
                            <div class="fib fib-col fib-8">
                                <p class="font-size-4 font-bold">Настройки аккаунта</p>
                                <p class="t-small">На этой странице вы можете настроить свой профиль, включая контактные данные, пароль и предпочтения.</p>
                                <a href="{{ route('users.show', compact('user')) }}" class="color-second">« Личный кабинет</a>
                            </div>
                        </div>

                        <div class="frame-outline fib fib-col fib-13">

                            <div>
                                <a class="action hover" href="#">
                                    <img class="image-16"
                                        src="https://img.icons8.com/small/16/333333/bank-card-front-side.png" />Смена
                                    логина</a>

                                <a class="action hover" href="#">
                                    <img class="image-16"
                                        src="https://img.icons8.com/small/16/333333/bookmark-ribbon--v1.png" />Смена
                                    пароля</a>
                            </div>
                        </div>

                        <div class="frame-outline fib fib-col fib-13">
                            <div>
                                <a class="action hover" href="#">
                                    <img class="image-16" src="https://img.icons8.com/small/16/FA5252/delete.png" /><span
                                        class="color-danger">Удаление аккаунта</span></a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col">
                    <div class="fib fib-col fib-gap-21">
                        <form class="frame fib fib-col fib-21" method="POST" action="{{ route('auth.changeUsername') }}">
                            @csrf

                            <div class="frame-outline fib fib-col fib-13">
                                <p class="font-size-4 font-bold fib-p-8">Смена Логина</p>
                                <div class="fib fib-col">
                                    <label class="fib-p-8 font-size-6">Новый логин</label>
                                    <input class="action hover hover-second" type="text" name="name" required>
                                </div>

                                <div class="fib fib-col">
                                    <label class="fib-p-8 font-size-6">Текущий пароль</label>
                                    <input class="action hover hover-second" type="password" name="password" required>
                                </div>

                                <button class="action hover action-bold hover-accent" type="submit">
                                    <img class="image-16" src="https://img.icons8.com/small/16/ffffff/save.png" />
                                    Сохранить
                                </button>
                            </div>
                        </form>

                        <form class="frame fib fib-col fib-21" method="POST" action="{{ route('auth.changePassword') }}">
                            @csrf

                            <div class="frame-outline fib fib-col fib-13">
                                <p class="font-size-4 font-bold fib-p-8">Смена Пароля</p>
                                <div class="fib fib-col">
                                    <label class="fib-p-8 font-size-6">Текущий пароль</label>
                                    <input class="action hover hover-second" type="password" name="old_password" required>
                                </div>

                                <div class="fib fib-col">
                                    <label class="fib-p-8 font-size-6">Новый пароль</label>
                                    <input class="action hover hover-second" type="password" name="password" required>
                                </div>

                                <div class="fib fib-col">
                                    <label class="fib-p-8 font-size-6">Подтверждение нового пароля</label>
                                    <input class="action hover hover-second" type="password" name="password_confirmation"
                                        required>
                                </div>

                                <button class="action hover action-bold hover-accent" type="submit">
                                    <img class="image-16" src="https://img.icons8.com/small/16/ffffff/save.png" />
                                    Сохранить
                                </button>
                            </div>
                        </form>

                        <form class="frame fib fib-col fib-21" method="POST"
                            action="{{ route('auth.destroy', compact('user')) }}">
                            @csrf
                            @method('DELETE')

                            <div class="frame-outline fib fib-col fib-13">
                                <p class="font-size-4 font-bold fib-p-8">Удаление аккаунта</p>

                                <div class="fib fib-col">
                                    <label class="fib-p-8 font-size-6">Текущий пароль</label>
                                    <input class="action hover hover-second" type="password" name="password" required>
                                </div>

                                <div class="fib fib-col">
                                    <label class="fib-p-8 font-size-6">Подтверждение пароля</label>
                                    <input class="action hover hover-second" type="password" name="password_confirmation"
                                        required>
                                </div>

                                <button class="action hover action-bold hover-danger" type="submit">
                                    <img class="image-16" src="https://img.icons8.com/small/16/ffffff/delete.png" />
                                    Удалить аккаунт
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
