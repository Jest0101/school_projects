function headerr() {

    const profile = document.getElementById("profile")
    const tools = document.getElementById("tools")
    const legends = document.getElementById("legends")
    const logout = document.getElementById("logout")
}

headerr()



const edit = document.getElementById("edit")
const all = document.getElementById("all")

edit.addEventListener("click", function () {
    all.style.display = "flex"
})