<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto flex justify-center">

        <div class="login-forms mt-8 w-1/3 bg-gradient-to-b from-blue-300 to-blue-200 p-8">
            <div class="admin flex items-center gap-3 font-bold mb-5">
                <h1>Kharaa Bank</h1>
            </div>

            <form method="POST" action="{{ route('login.bank.proceed') }}" class="mb-8">
                @csrf
                <div class="user-id">
                    <label for="">Email Or Username</label>
                    <input name="username" id="user-id"
                        class="w-full mt-2 px-4 py-2 bg-gray-100 rounded-md focus:outline-none focus:border-[#003034] focus:border-2"
                        type="text" placeholder="Enter Your Username/Email">
                </div>
                <div class="user-password mt-4">
                    <label for="">Password</label>
                    <input name="password" type="password" id="user-password"
                        class="w-full mt-2 px-4 py-2 bg-gray-100 rounded-md focus:outline-none focus:border-[#003034] focus:border-2"
                        type="text" placeholder="Enter Your Password">
                </div>
                <div class="user-remember flex items-center gap-2 mt-3">
                    <input type="checkbox">
                    <p>Remember Me</p>
                </div>

                <button type="submit" id="submit-login"
                    class="w-full bg-blue-700 text-white font-semibold p-2 rounded-md mt-4">Login</button>
            </form>
        </div>
    </div>

</body>

</html>
