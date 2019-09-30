document.addEventListener("DOMContentLoaded", (event) => {
  //do work
  console.log('Loaded done')

  function showAllPosts() {
    // let output = '<h3>Posts</h3>'

    fetch('misse.json')
      .then((resp) => resp.json()) // Transform the data into json
      .then((data) => {
        console.log(data)
        let output = '<ul>'

        data.forEach((item) => {
          // console.log(item.date)
          output += `
            <li>
              <img src="img/image_01.jpg" alt="">
                <div class="content">
                  <span>${ item.date}</span>
                  <a href="">${ item.header}</a>
                  <p>${ item.content}</p>
                  <p>${ item.image}</p>
                </div>
            </li>`
        })
        output += '</ul>'
        document.getElementById('postList').innerHTML = output
      })

  }
  showAllPosts()
})
