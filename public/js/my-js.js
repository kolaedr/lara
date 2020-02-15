const links = document.querySelector('.categories')
// const linksCategories = document.querySelectorAll('a[data-cat__id]')
const news = document.querySelectorAll('div[data-category]')

if (links) {
  links.addEventListener('click', (e) => {
    for (const iterator of news) {
      if (e.target.getAttribute('data-cat__id') !== iterator.getAttribute('data-category') && e.target.getAttribute('data-cat__id') !== 'all') {
        iterator.style.display = 'none'
      } else {
        iterator.style.display = 'flex'
      }
    }
  })


};

const revoveImg = document.querySelector('.remove-img');
if (revoveImg) {
  revoveImg.addEventListener('click', (e)=>{
  e.preventDefault();
  document.querySelector('.thumbnail').remove();
  e.srcElement.remove();
  // this.remove().bind(this);
  document.querySelector('[name="removeImg"]').value = 'remove';
})
}

CKEDITOR.replace( 'content' );