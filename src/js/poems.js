document.addEventListener("DOMContentLoaded", (event) => {

  //do work
  console.log('Loaded done')
  const poemUrl = 'https://misseblogg.xyz/api/poem/'
  let url = poemUrl + 'read.php'

  function showAllPoems() {
    // let output = '<h3>Posts</h3>'

    fetch(url)
      .then(res => res.json())
      .then(data => {
        console.log(data)
        let poems = data.records
        let output = '<ul>'

        poems.forEach((poem) => {
          // console.log(poem.date)
          let text = poem.body
          console.log(text)
          let published = poem.created_at.substr(0, 10)
          output += `
            <li>
              <img src="img/${poem.image}" alt="">
                <div class="content">
                  <span>${published} - ${poem.topic}</span>
                  <a href="">${poem.title}</a>
                  <p>${poem.body}</p>
                  <p>${poem.author}</p>
                </div>
            </li>`
        })
        output += '</ul>'
        document.getElementById('poemList').innerHTML = output
      })

  }
  showAllPoems()
})
