@extends('admin.main')
@section('head')
    <link rel="stylesheet" href="/template/css/admin/changepwd.css" class="css">
@endsection
@section('content')
    @include('alert')
    <form action="/admin/changePwd" method="POST" class="changepwdform">
        @csrf
        <table>
            <tr class="head-table">
                <th colspan='2'>
                    Đổi mật khẩu
                </th>
            </tr>
            <tr>
                <td class="label">
                    Mật khẩu cũ
                </td>
                <td class="field">
                    <input type="password" name="pwd">
                </td>
            </tr>
            <tr>
                <td class="label">
                    Mật khẩu mới
                </td>
                <td class="field">
                    <input type="password" name="newpwd">
                </td>
            </tr>
            <tr>
                <td class="label">
                    Nhập lại mật khẩu mới
                </td>
                <td class="field">
                    <input type="password" name="newpwd2">
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td >
                    <input type="submit" value="Đổi mật khẩu" class="submit">
                </td>
            </tr>
        </table>

    </form>
@endsection
