window.addEventListener("load", () => refreshCartNumber());

function addToCart(userId, cakeId) {
    if (userId == 0) {
        launch_toast("Please login to add cake!");
        return;
    }

    var documentRoot = document.getElementById('documentRoot').innerText;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.response);
            if (response.isSuccess == true) {
                refreshCartNumber(response.numInCart);
                launch_toast("Added to cart suceess!");
            }
            else {
                launch_toast("Can't Thêm vào giỏ +!");

                console.error(response.error);

            }
        }

    };
    xhttp.open("GET", `${documentRoot}//Cart//addToCart?idcake=${cakeId}&iduser=${userId}`, true);
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

function refreshCartNumber(cartNumber = -1) {
    var cartNumberElement = document.getElementById("numInCartID");


    if (cartNumber !== -1) {
        cartNumberElement.innerText = cartNumber;
    } else {
        var documentRoot = document.getElementById('documentRoot').innerText;
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                cartNumber = this.responseText;
                cartNumberElement.innerText = cartNumber;
            }
        };
        xhttp.open("GET", `${documentRoot}//Cart//amountInCart`, true);
        xhttp.send();
    }
}