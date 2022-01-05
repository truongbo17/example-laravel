@extends('pos.app')
@section('content')
    <div class="container">
        <div class="row" style="padding:15px">
            <form method="GET" class="form-inline">
                <input type="text" name="search" id="search" class="form-control" placeholder="searching..."
                    style="width:350px">
                <input type="submit" class="form-control" value="Search">
            </form>
        </div>
        <div class="row">
            <div class="col-md-6" style="background-color: aliceblue">
                <table class="table table-bordered table-striped bg-white">
                    <thead>
                        <th>thumbnail</th>
                        <th>title</th>
                        <th>num</th>
                        <th>price</th>
                        <th>total</th>
                        <th></th>
                    </thead>
                    <tbody id="cartList">

                    </tbody>
                </table>
                <div class="form-inline">
                    <p>
                        Total money :
                    </p>
                    <p id="total_money"></p>
                </div>
                <div class="form-inline">
                    <p>Input Money : </p>
                    <input type="number" name="inputmoney" id="inputmoney" class="form-control">
                </div>
                <div class="form-inline">
                    <p>Cash back : </p>
                    <p id="cashback"></p>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success" style="width:100%" onclick="submitOrder()">Save</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    @foreach ($productList as $item)
                        <div class="col-md-4 item" style="border: 1px solid red" field-thumbnail="{{ $item->thumbnail }}"
                            field-title="{{ $item->title }}" field-price="{{ $item->price }}"
                            field-id="{{ $item->id }}">
                            <img src="{{ $item->thumbnail }}" alt="" style="width: 100%">
                            <p style="color:red">{{ number_format($item->price) }} VND</p>
                            <p>{{ $item->category_name }}</p>
                            <p>{{ $item->title }}</p>
                        </div>
                    @endforeach
                </div>
                {{ $productList->links() }}
            </div>
        </div>
    </div>
    <script>
        var cartList = [];
        var total_money = 0

        $(function() {
            var json = localStorage.getItem('cartList');
            if (json != null && json != '') {
                cartList = JSON.parse(json);
                showCart();
            }

            $('.item').click(function() {
                var id = $(this).attr('field-id');
                var thumbnail = $(this).attr('field-thumbnail');
                var title = $(this).attr('field-title');
                var price = $(this).attr('field-price');

                var isFind = true; //biến check sản phẩm trong giỏ hàng
                for (let index = 0; index < cartList.length; index++) {
                    if (cartList[index].id == id) {
                        cartList[index].num++;
                        isFind = false; //tồn tại sản phẩm này rồi nên chuyển thành false 
                    }
                }
                //chưa có sản phẩm này trong giỏ hàng
                if (isFind) {
                    cartList.push({
                        'id': id,
                        'thumbnail': thumbnail,
                        'title': title,
                        'price': price,
                        'num': 1
                    })
                }
                showCart();
            })

            //input money -> tính tiền thừa trả khách
            $('[name=inputmoney]').keyup(function() {
                cash = $(this).val();
                cashback = cash - total_money;
                console.log(cashback);
                $('#cashback').html(cashback);
            })

        })

        function showCart() {
            $('#cartList')
                .empty(); //mỗi lần gọi hàm showCart sẽ xóa hết những value cũ đi để add lại toàn bộ value mới từ cartList bằng for => nếu không xóa sẽ bị lỗi

            for (let i = 0; i < cartList.length; i++) {
                var money = cartList[i].price * cartList[i].num;
                $('#cartList').append(`
                <tr>
                <td><img src="${cartList[i].thumbnail}" style="width:90px"></td>
                <td>${cartList[i].title}</td>
                <td><input type="number" value="${cartList[i].num}" class="form-control" onchange="changeAmount(this,${cartList[i].id})" style="width:50px"></td>
                <td>${cartList[i].price}</td>
                <td id="money">${money}</td>
                <td><button class="btn btn-danger" onclick="deleteItem(${cartList[i].id})">X</button></td>
                </tr>
                `);

                total_money += money;
            }

            //lưu vào localstorage
            localStorage.setItem('cartList', JSON.stringify(cartList));
            $('#total_money').html(total_money);
        }

        function changeAmount(that, productId) {
            var currentAmount = $(that).val();

            for (let index = 0; index < cartList.length; index++) {
                if (cartList[index].id == productId) {
                    cartList[index].num = currentAmount;

                    //update giao dien
                    var money = currentAmount * cartList[index].price;
                    $(that).parent().parent().find('#money').html(money);
                    break;
                }
            }

            // showCart();
            localStorage.setItem('cartList', JSON.stringify(cartList));
        }

        function deleteItem(id) {
            for (let index = 0; index < cartList.length; index++) {
                if (cartList[index].id == id) {
                    cartList.splice(index, 1);
                    break;
                }
            }

            showCart(); //xóa xong gọi đến showCart để làm mới lại giỏ hàng từ đầu
        }

        function submitOrder() {
            var json = localStorage.getItem('cartList');
            if (json != null && json != '') {
                $.post('{{ route('pos_save') }}', {
                    data: json,
                    'total_money': total_money,
                    '_token': '{{ csrf_token() }}'
                }, function(data) {
                    alert(data);
                    localStorage.removeItem('cartList');
                    location.reload();
                })
            }
        }
    </script>
@endsection
