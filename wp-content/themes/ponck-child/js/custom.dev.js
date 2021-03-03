// const selectCats = document.querySelectorAll('.select-cat');
// for(let selectCat of selectCats) {
//     selectCat.addEventListener('click', (e) => {

//         const data = e.target.dataset.category;
//         const filterableArticles = document.querySelectorAll('.case.toggle-active');

//         if(filterableArticles) {

//             for(let article of filterableArticles) {

//                 const catIds = article.dataset.categories.split(",");
                
//                 if(data == 0) {
//                     article.classList.remove('d-none');

//                 } else {

//                     if(catIds.includes(data)) {
//                         article.classList.remove('d-none');
//                     } else {
//                         article.classList.add('d-none');
//                     }

//                 }
            
//             }

//         }

//     });
// }