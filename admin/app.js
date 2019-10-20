function getInputValue(element) {
  console.log(element)
  // Selecting the input element and get its value
  let inputVal = document.getElementById(element).value;

  // Displaying the value
  return inputVal
}

const blogList = document.getElementById('blog-data')
const allBlogBtn = document.getElementById('allBlog')
const createPoemBtn = document.getElementById('createPoem')
const createBlogBtn = document.getElementById('createBlog')
const updateBlogBtn = document.getElementById('updateBlog')
const deleteBlogBtn = document.getElementById('deleteBlog')
const deletePoemBtn = document.getElementById('deletePoem')

allBlogBtn.addEventListener('click', (event) => {
  fetchBlogs()
})

deletePoemBtn.addEventListener('click', (event) => {
  let id = getInputValue('poemDeleteId')
  console.log('id is ' + id)
  deletePoem(id)
})

createPoemBtn.addEventListener('click', (event) => {
  var createPoemForm = document.getElementById("createPoemForm");
  let data = {}

  data.title = $('#poemCreateTitle').val()
  data.body = $('#poemCreateBody').val()
  data.topic = $('#poemCreateTopic').val()
  data.image = $('#poemCreateImage').val()
  data.author = $('#poemCreateAuthor').val()
  console.log(data)
  createPoem(data)
})

createBlogBtn.addEventListener('click', (event) => {
  var createForm = document.getElementById("createForm");
  let data = {}

  data.header = $('#blogCreateHeader').val()
  data.content = $('#blogCreateContent').val()
  data.image = $('#blogCreateImage').val()
  data.author = $('#blogCreateAuthor').val()
  console.log(data)
  createBlog(data)
})

updateBlogBtn.addEventListener('click', (event) => {
  var updateForm = document.getElementById("updateForm");
  // Extract Each Element Value
  let data = {}
  data.id = $('#blogUpdateId').val()
  data.header = $('#blogUpdateHeader').val()
  data.content = $('#blogUpdateContent').val()
  data.image = $('#blogUpdateImage').val()
  data.author = $('#blogUpdateAuthor').val()
  console.log(data)
  updateBlog(data)
})

deleteBlogBtn.addEventListener('click', (event) => {
  let data = {}
  data.id = getInputValue('blogDeleteId')

  deleteBlog(data)
})
