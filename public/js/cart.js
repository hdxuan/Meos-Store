// khi load lại trang lấy lại số trong cart
window.addEventListener("load", refreshCartNumber);

function addToCart(userId, productId) {
    if (userId == 0) {
        launch_toast("Đăng nhập để thêm sản phẩm!");
        return;
    }
    // lay documentRoot id ben layout
    var documentRoot = document.getElementById('documentRoot').innerText;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.response);// ??
            if (response.isSuccess == true) {
                refreshCartNumber();
                launch_toast("Đã thêm vào giỏ hàng!");
            }
            else {
                launch_toast("Không thể thêm vào giỏ hàng!");
                console.error(response.error);

            }
        }

    };
    // 
    xhttp.open("GET", `${documentRoot}//Cart//addToCart?idProduct=${productId}&idUser=${userId}`, true); // template string
    xhttp.send();
}

function launch_toast(message) {
    var x = document.getElementById("toast");
    document.getElementById("desc").innerText = message;

    x.className = "show";
    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 5000);
}

function refreshCartNumber() {
    var documentRoot = document.getElementById('documentRoot').innerText; // lay bien document

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cartAmount").innerText = this.responseText;
        }
    }
    //Call function amountInCart() in CartController
    xhttp.open("GET", `${documentRoot}//cart//amountInCart`, true);
    xhttp.send();
}