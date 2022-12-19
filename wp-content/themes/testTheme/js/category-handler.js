class Filter {
    constructor() {
        this.content = document.querySelector('.posts-container');
        this.categories = document.querySelectorAll('.category-name');
        this.genericPosts = document.querySelectorAll('.generic-posts');
        this.paginationSpan = document.querySelector('.pagination');
        this.allPosts = document.getElementById('all-posts');
        this.container = document.querySelector('.posts-container');
        this.catName;
        this.events();
    }

    // event
    events() {
        this.categories.forEach(element => {
            element.addEventListener('click', this.displayCategoryPostsHandler.bind(this));
        });
        this.allPosts.addEventListener('click', this.displayAllPostsHandler.bind(this));
    }
    
    //methods
    truncateString(string, limit) {
        if (string.length > limit) {
          return string.substring(0, limit) + "..."
        } else {
          return string
        }
    }

    displayAllPostsHandler (event) {
        event.preventDefault();
        const posts = document.querySelectorAll('.post-box');
        console.log(posts)
        posts.forEach(post => {
            if(!post.classList.contains('non-visible')) {
                this.container.removeChild(post);
            }
        })
        this.genericPosts.forEach(post => post.classList.remove('non-visible'));
        this.paginationSpan.classList.remove('non-visible');
    }

    displayCategoryPostsHandler (event) {
        event.preventDefault();
        this.catName = event.target.innerText;
        const dataURL = this.catName;
        this.genericPosts.forEach(post => post.classList.add('non-visible'));
        this.paginationSpan.classList.add('non-visible');

        const posts = document.querySelectorAll('.post-box');
        console.log(posts)
        posts.forEach(post => {
            if(!post.classList.contains('non-visible')) {
                this.container.removeChild(post);
            }
        })

        entries.forEach(element => {
            if(element.includes(dataURL)) {
                const categoryID = element[1];

                fetch(`http://localhost/test/wp-json/wp/v2/posts`)
                .then((response) => response.json())
                .then((data) => {
                    data.forEach(post => {
                        let child = document.createElement('div');
                        child.classList.add('post-box');

                        if(post.categories[0] === categoryID) {
                            child.innerHTML = `
                                <h2><a href='${post.link}'>${post.title.rendered}</a></h2>
                                <p>Category: ${dataURL}</p>
                                <img src="${post.fimg_url}" class="size-post-thumbnail"/>
                                <p>${this.truncateString(post.content.rendered, 120)}</p>
                            `;

                            this.container.appendChild(child);
                        }
                    })
                })
            }
        })
        
    }
}
