
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function AddToCart(product_id,user_id)
{
    $.ajax({
        method : "POST",
        url  : "cart",
        data  : {product_id : product_id, user_id : user_id },
        cache:false,
        success: function (data) {
        if(data.message == 'success')
        {
            Toast.fire({
                icon: 'success',
                title: 'Has Been Added To The Cart'
            })
        }
        },
    })

}


function Carttotal()
{
    var product_price = document.getElementsByClassName("productPrice");

    var product_quantity = document.getElementsByClassName("proQuan");

    var price = document.getElementById("totalPrice");

    var totalPrice = 0;

    for (let index = 0; index < product_price.length ; index++) 
    {
        var proPrice = Number(product_price[index].getAttribute("price"))

        var proQuan = product_quantity[index].value

        totalPrice = totalPrice +  (proPrice * proQuan)
    }

    price.innerHTML = totalPrice

    StoreTotalPrice()

    return totalPrice;

}

function ConfirmDelete(cart_id)
{
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
        DeleteCart(cart_id)
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
}

function DeleteCart(cart_id) 
{
    $.ajax({
        method : "DELETE",
        url  : `cart/${cart_id}`,
        data  : {},
        cache:false,
        success: function (data) {
            if(data)
            {
                $(`#cart${cart_id}`).slideUp(600,function () {
                    $(`#cart${cart_id}`).remove();

                });

                $('#totalPrice').text( Number($('#totalPrice').text()) - ( $(`#cart_price_${cart_id}`).text() * $(`#quan${cart_id}`).val()) )
            }
       },
       error: function (data) {}
    })
}

function IncreaseCart(cart_id,product_price)
{
    var quantity = $(`#quan${cart_id}`).val();

    $.ajax({
        method : "PUT",
        url : `cart/${cart_id}`,
        data  : {
            quantity : Number(quantity) + 1
        },
        cache:false,
        success: function (data) {},
        error: function (data) {}
    })

    $('#totalPrice').text( Carttotal()  + product_price )

    StoreTotalPrice()

}

function DecreaseCart(cart_id,product_price)
{
    var quantity = $(`#quan${cart_id}`).val();

    if (quantity == 1) return

    $.ajax({
        method : "PUT",
        url : `cart/${cart_id}`,
        data  : {
            quantity : Number(quantity) - 1
        },
        cache:false,
        success : function (data) {},
        error : function (data) {}
    })

    $('#totalPrice').text( Carttotal() - product_price )

    StoreTotalPrice()

}


function StoreTotalPrice()
{
    var Total_Price = $(`#totalPrice`).text();

    localStorage.setItem("total_price", Total_Price )
}


document.getElementsByClassName('total_price')[0].innerHTML = localStorage.getItem('total_price')
document.getElementsByClassName('total_price')[1].innerHTML = localStorage.getItem('total_price')
document.getElementsByClassName('total_price')[2].setAttribute('value',localStorage.getItem('total_price'))
