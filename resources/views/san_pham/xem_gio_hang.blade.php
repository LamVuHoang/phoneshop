@extends('productmaster')

@section('title')
    Xem Đặt Hàng
@endsection

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-12 text-center p-2 text-danger h2">Giỏ hàng</div>
            @if (isset($don_hang))
                <div class="col-12">
                    <form action="{{url('')}}" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th>rowID</th> --}}
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($don_hang as $item)
                                    <tr>
                                        {{-- <td scope="row">{{ $item->rowId }}</td> --}}
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td>{{ number_format($item->qty * $item->price) }}</td>
                                        <td>
                                            <button type="button" type="submit" class="btn btn-danger" name="delete"
                                                value="{{ $item->rowId }}">
                                                <i class="bi bi-trash text-white"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">Tổng tiền</td>
                                    <td colspan="2">{{ Cart::total() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>

                </div>
            @else
                <div class="col-12 h3 text-center text-secondary">Xin lỗi, giỏ hàng trống</div>
            @endif
        </div>
    </section>
@endsection
