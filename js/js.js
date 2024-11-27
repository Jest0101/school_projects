const loginnave = document.getElementById("loginnave")
const registernav = document.getElementById("registernav")
const register = document.getElementById("register")
const loginn = document.getElementById("loginn")


loginnave.addEventListener("click", function () {
    register.style.display = "none"
    loginn.style.display = "flex"
})

registernav.addEventListener("click", function () {
    loginn.style.display = "none"
    register.style.display = "flex"
})
