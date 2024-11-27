const contbig = document.getElementById("contbig")

let fetched =[]

let data = '';
function showlegends(array) {

    for (let i = 0; i < array.length; i++) {

    console.log(array[i]);
            
    data += `<div class="contentcontainer">
    
            <div class="profilediv">
                <div class="imgandprofile">
                    <img class="profileimage" src="${array[i].image}" alt="">
                    <div>
                        <h1 class="namelastfirst">${array[i].first_name} ${array[i].last_name}</h1>
                        <p class="username">@${array[i].username}</p>
                    </div>
                </div>
    
                <div class="descriptionandinfo">
    
                    <div class="description">
                        <p>${array[i].description}</p>
    
                    </div>
                </div>
                <div class="sourcediv">
                    <h3>Other sources:</h3>
                    <ul>
                        <li><a href="${array[i].github_link}" target="_blank"><i class="fa-brands fa-github"></i> Github</a></li>
                    </ul>
                    <h3>Other contacts:</h3>
                    <ul>
                        <li><a href="mailto:${array[i].email}" target="_blank"><i class="fa-solid fa-envelope"></i> Email</a></li>
                        <li><a href="${array[i].linkden}" target="_blank"><i class="fa-brands fa-linkedin"></i>Linkden</a></li>

                    </ul>
            </div>
            </div>
            
        </div>
    `
            
        }

        contbig.innerHTML = data

    }
    

axios.get('fetch/legends_fetch.php')
        .then(function(response) {
            showlegends(response.data)
        })


