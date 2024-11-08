// Login
const loginForm = document.querySelector("#login-form");
if(loginForm) {
    loginForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const email = event.target.email.value;
        const password = event.target.password.value;

        if(email && password) {
            alert("Đăng nhập thành công");
            window.location.href = "index.html";
        } else {
            alert("Bạn chưa nhập tài khoản hoặc mật khẩu");
        }
    });
}

//Register
const registerForm = document.querySelector("#register-form");
if(registerForm) {
    registerForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const fullName = event.target.fullName.value;
        const email = event.target.email.value;
        const phoneNumber = event.target.sdt.value
        const password = event.target.password.value;
        
        if(fullName && email && phoneNumber && password) {
            alert("Bạn đã đăng ký tài khoản thành công");
            window.location.href = "login.html";
        } else {
            alert("Bạn chưa nhập đầy đủ các thông tin cần thiết");
        }
    })
}

//pagination
const paginationAll = document.querySelectorAll(".pagination-all")
if(paginationAll){
    paginationAll.forEach((item) => {
        item.addEventListener("click", () => {
            const itemPagi = document.querySelector(".pagination-bg");
            if(itemPagi) {
                itemPagi.classList.remove("pagination-bg")
            }
            item.classList.add("pagination-bg")
        })
    })
}

//discount code
const discountCode = document.querySelector(".discount-code");
if(discountCode) {
    const discount = discountCode.querySelectorAll(".discount");
    discount.forEach(item => {
        item.addEventListener("click", () => {
            const colorBg = document.querySelector(".color-bg");
            if(colorBg) {
                colorBg.classList.remove("color-bg");
            }
            item.classList.add("color-bg");
        })
    })
}

//color size
const innerSize = document.querySelector(".inner-size");
if(innerSize) {
    const size = innerSize.querySelectorAll(".size");
    size.forEach(item => {
        item.addEventListener("click", () => {
            const colorBg = document.querySelector(".color-size");
            if(colorBg) {
                colorBg.classList.remove("color-size");
            }
            item.classList.add("color-size");
        })
    })
}

//submit
const productDetail = document.querySelector(".submit");
if(productDetail) {
    const overlay = document.querySelector(".overlay");
    productDetail.addEventListener("click", () => {
        overlay.classList.add("show-overlay");
    })
    overlay.addEventListener("click", () => {
        overlay.classList.remove("show-overlay");
    })
}

//edit profile
const nameUser = document.querySelector("#nameUser");
if(nameUser) {
    const nameLogin = document.querySelector(".name-login");
    nameUser.addEventListener("click", () => {
        nameLogin.classList.toggle("show-user");
    })
}

const emailUser = document.querySelector("#emailUser");
if(emailUser) {
    const emailLogin = document.querySelector(".email-login");
    emailUser.addEventListener("click", () => {
        emailLogin.classList.toggle("show-user");
    })
}

const passwordUser = document.querySelector("#passwordUser");
if(passwordUser) {
    const passwordLogin = document.querySelector(".password-login");
    const passwordAgain = document.querySelector(".password-again");
    passwordUser.addEventListener("click", () => {
        passwordLogin.classList.toggle("show-user");
        passwordAgain.classList.toggle("show-user");
    })
}

const addressUser = document.querySelector("#addressUser");
if(addressUser) {
    const addressLogin = document.querySelector(".address-login");
    addressUser.addEventListener("click", () => {
        addressLogin.classList.toggle("show-user");
    })
}