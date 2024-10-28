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