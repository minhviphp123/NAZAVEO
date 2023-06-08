function removeRow(menuId) {
    if (confirm('Bạn có chắc chắn muốn xóa menu này không?')) {
        $.ajax({
            url: '/menu/destroy',
            method: 'GET',
            data: {
                id: menuId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Xử lý phản hồi từ server nếu cần
                console.log(response);

                if (response.error == false) {
                    location.reload();
                    alert('removed');
                }
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.log(xhr.responseText);
            }
        });
    }

}


function uploadImage(tagName, img) {
    var fileInput = document.getElementById(tagName);
    var file = fileInput.files[0];

    console.log(file);
    var form = new FormData();
    form.append('file', file);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/product/get-img', true);
    // xhr.open('POST', '/product/store', true);


    // xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var fileName = response.img.split('/').pop();
            // console.log(fileName, response);
            const thumb = document.getElementById(img);
            thumb.src = '/images/' + fileName;
        } else {
            console.log(3);
        }
    };
    xhr.send(form);
}

function getProductById(prodId) {
    $.ajax({
        url: '/user/product-detail/' + prodId,
        type: "GET",
        dataType: "json",
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

function clickChild() {

}