let options = ['All', 'IT & Software', 'Data Science', 'AI/ML', 'Digital Marketing',
    'Cyber Security', 'Cloud Computing', 'Big Data', 'UI/UX Design'
];
let current_index = 0, prev_index;

const get_courses = (category) => {

    const request = new XMLHttpRequest();
    request.open('POST', 'courses.php');
    request.setRequestHeader('Content-Type', 'application/json');
    request.send(JSON.stringify({
        category,
        function: 'GetCourseByCategory'
    }));

    request.onload = () => {

        prev_index = current_index;
        document.getElementById(prev_index).classList.remove('active')
        current_index = options.indexOf(category);
        document.getElementById(current_index).classList.add('active')

        const card_container = document.querySelector('.card_container');
        card_container.innerHTML = '';

        if (request.responseText === 'null') {
            card_container.innerHTML += `<div class="no_data">
                <img src='../images/empty-box.png' alt='no data'/>
                <h2>Coming Soon...</h2>
            </div>`;
        }
        else {

            let courses = JSON.parse(request.responseText);
            courses.forEach(value => {

                card_container.innerHTML += `
                    <div class="card" style="width: 18rem;">
                        <img src="../images/${value[6]}" alt="${value[1]}" alt=${value[1]}/>
                        <div class="content">
                            <h3>${value[1]}</h3>
                            <span>${value[2]} </span>
                            <span class="fa fa-star checked"></span>
                            <div class="price_duration">
                                <p style="font-weight: bold;">Price: &#8377;${value[3]}</p>
                                <p><i class="fa fa-clock-o"></i> ${value[4]}</p>
                            </div>
                            <button class='course_id' id="${value[0]}" onclick='add_cart(this.id)'>Add To Cart</button>
                            <a class='course_detail' href='course_details.php?id=${value[0]}'>View More</a>
                        </div>
                    </div>`
            })
        }
    }
};

const add_cart = (id) => {

    const request = new XMLHttpRequest();
    request.open('POST', 'cart.php');
    request.setRequestHeader('Content-Type', 'application/json')
    request.send(JSON.stringify({ id, function: "AddToCart" }))
    request.onload = () => {
        let response = request.responseText
        if (response === 'false')
            window.location.href = 'login.php';
        else if (response === 'true')
            alert('Course is already added in cart');
    }
}
const get_categories = () => {
    let categories = document.querySelector('.categories');
    options.forEach((value, index) => {
        categories.innerHTML += `<button type='submit' id=${index}  onclick='get_courses(this.value)' value='${value}'>${value}</button>`;
    });
}

window.onload = () => {
    get_categories();
    get_courses('All');
}
