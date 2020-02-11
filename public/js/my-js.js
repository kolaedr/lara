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

//   for (const item of linksCategories) {
//     console.log(item.children)
//     for (const iterator of news) {
//         if (item.getAttribute('data-cat__id') === iterator.getAttribute('data-category')) {
//           iterator.style.display = 'none'
//         } else if (e.target.getAttribute('data-cat__id') === 'all') {
//           iterator.style.display = 'flex'
//         } else {
//           iterator.style.display = 'flex'
//         }
//       }
//   }
};
