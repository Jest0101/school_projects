const contbig = document.getElementById("contbig")
const projectconatiner = document.getElementById("projectconatiner")




let fetched =[]

let data = '';
let dataa = '';

function showlegends(array) {
    let arr = array.user
    let posts = array.posts
    

            
    data = `
    
            <div class="profilediv">
                <div class="imgandprofile">
                    <img class="profileimage" src="${arr.image}" alt="">
                    <div>
                        <h1 class="namelastfirst">${arr.first_name} ${arr.last_name}</h1>
                        <p class="username">@${arr.username}</p>
                    </div>
                </div>
    
                <div class="descriptionandinfo">
    
                    <div class="description">
                        <p>${arr.description}</p>
    
                    </div>


                </div>
                <div class="sourcediv">
                    <h3>Other sources:</h3>
                    <ul>
                        <li><a href="${arr.github_link}" target="_blank"><i class="fa-brands fa-github"></i> Github</a></li>
                    </ul>
                    <h3>Other contacts:</h3>
                    <ul>
                        <li><a href="mailto:${arr.email}" target="_blank"><i class="fa-solid fa-envelope"></i> Email</a></li>
                        <li><a href="${arr.linkden}" target="_blank"><i class="fa-brands fa-linkedin"></i>Linkden</a></li>
                    </ul>
            </div>
            </div>
            
        
    `
            
        

        contbig.innerHTML = data

        for (let j = 0; j < posts.length; j++) {
            
            dataa += `
            <div class="postcontainer" id="" postcontainer>
                <img class="img" src="../assets/tool_img/${posts[j].image}" alt="">
                <div class="postinfo" id="postinfo">
                    <div class="nameANDname" id="nameANDname">
                        <img  src="${arr.image}" alt="">
                        <h2>${posts[j].title}</h2>
                        <h4>@${arr.username}</h4>
                    </div>
                    <div class="descreptioncontainer">
    
                        <p>
                        ${posts[j].content}
                        </p>
                    </div>
                    <hr>
                    <div class="gitandhashtag">
                        <div class="hashtagcontainer">
                            <p class="hashtags">#networking</p>
                            <p class="hashtags">#networking</p>
                            <p class="hashtags">#networking</p>
                            <p class="hashtags">#networking</p>
                            <p class="hashtags">#networking</p>
                        </div>
                        <a id="githubtool" href="https://${posts[j].github_link}" target="_blank"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
            </div>
            `
        }


        projectconatiner.innerHTML = dataa

    }
    



        
axios.get('fetch/profile_fetch.php')
        .then(function(response) {
        console.log(response.data);
        showlegends(response.data)
            })


        