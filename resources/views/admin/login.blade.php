<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/template/css/cssreset.css" class="css">
    <link rel="stylesheet" href="/template/css/admin/login.css" class="css">
</head>
<body>
    <div class="wrap">
        <form action="/admin/auth" method="POST">
            @include('alert')
            @csrf
            <table>
                <tr class="head">
                    <th colspan="2">
                        Admin
                    </th>
                </tr>
                <tr>
                    <td class="label">
                        <label for="usr">Tài khoản</label>
                    </td>
                    <td class="field">
                        <input type="text" name="usr">
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="pwd">Mật khẩu</label>
                    </td>
                    <td class="field">
                        <input type="password" name="pwd">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Đăng nhập" class="submit">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</body>
</html>
