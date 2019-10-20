const blogUrl = 'https://misseblogg.xyz/api/blog/'
const poemUrl = 'https://misseblogg.xyz/api/poem/'
// const blogUrl = 'http://localhost/test/api/blog/'

function fetchBlogs() {
  let url = blogUrl + 'read.php'

  blogList.innerHTML = ``

  fetch(url)
    .then(res => res.json())
    // .then(text => console.log(text))  // then log it out
    .then(data => {
      console.log(data)
      let blogs = data.records
      blogs.forEach(function (blog) {
        blogList.innerHTML += `
          <div class="cardBlog text-center">
            <div class="cardBody">
              <h5 class="card-title">${blog.id}. ${blog.header}</h5>
              <p class="card-text">${blog.content}</p>
              <p>${blog.image}</p>
            </div>
          </div>`
      })
    })
}

function fetchSingleBlog(id) {
  let url = blogUrl + 'read_single.php?id=' + id

  blogSingle.innerHTML = ``

  const parcel = {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    }
  }

  fetch(url, parcel)
    .then(resp => resp.json())
    .then(data => {
      console.log(data)
      let blog = data

      blogSingle.innerHTML += `
        <div class="cardBlog text-center">
          <div class="cardBody">
            <h5 class="card-title">${blog.id}. ${blog.header}</h5>
            <p class="card-text">${blog.content}</p>
            <p>${blog.image}</p>
          </div>
        </div>`
    })
}

function createBlog(data) {
  let url = blogUrl + 'create.php'

  const parcel = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }

  try {
    fetch(url, parcel)
      .then(resp => resp.json())
      .then(resp => {
        console.log('The blog was succesfully created ' + JSON.stringify(resp))
      })
  } catch (error) {
    console.log('It was a problem with the create request: ', error.message);
  }
}


function updateBlog(data) {
  let url = blogUrl + 'update.php'

  const parcel = {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }

  try {
    fetch(url, parcel)
      .then(resp => resp.json())
      .then(resp => {
        console.log('The blog was succesfully updated ' + JSON.stringify(resp))
      })
  } catch (error) {
    console.log('It was a problem with the update request: ', error.message);
  }
}

function deleteBlog(data) {
  let url = blogUrl + 'delete.php'

  const parcel = {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }

  try {
    fetch(url, parcel)
      .then(resp => resp.json())
      .then(resp => {
        console.log('It was succesfully deleted ' + JSON.stringify(resp))
      })
  } catch (error) {
    console.log('It was a problem with the delete request: ', error.message);
  }
}

function deletePoem(data) {
  let url = poemUrl + 'delete.php'

  const parcel = {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }

  try {
    fetch(url, parcel)
      .then(resp => resp.json())
      .then(resp => {
        console.log('It was succesfully deleted ' + JSON.stringify(resp))
      })
  } catch (error) {
    console.log('It was a problem with the delete request: ', error.message);
  }
}

function createPoem(data) {
  let url = poemUrl + 'create.php'

  const parcel = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }

  try {
    fetch(url, parcel)
      .then(resp => resp.json())
      .then(resp => {
        console.log('The poem was succesfully created ' + JSON.stringify(resp))
      })
  } catch (error) {
    console.log('It was a problem with the create request: ', error.message);
  }
}

