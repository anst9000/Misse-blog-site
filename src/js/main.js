document.addEventListener("DOMContentLoaded", (event) => {

  //do work
  console.log('Loaded done')
  const blogUrl = 'https://misseblogg.xyz/api/blog/'
  let url = blogUrl + 'read.php'

  function showAllPosts() {
    // let output = '<h3>Posts</h3>'

    fetch(url)
      .then(res => res.json())
      .then(data => {
        console.log(data)
        let blogs = data.records
        let output = '<ul>'

        blogs.forEach((blog) => {
          // console.log(blog.date)
          let published = blog.created_at.substr(0, 10)
          output += `
            <li>
              <img src="img/${blog.image}" alt="">
                <div class="content">
                  <span>${published}</span>
                  <a href="">${blog.header}</a>
                  <p>${blog.content}</p>
                  <p>${blog.image}</p>
                </div>
            </li>`
        })
        output += '</ul>'
        document.getElementById('postList').innerHTML = output
      })

  }
  showAllPosts()
})

