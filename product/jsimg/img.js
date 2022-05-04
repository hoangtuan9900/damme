function changeImage(id) {
    let imagePath = document.getElementById(id).getAttribute('src');
    document.getElementById('imgmain').setAttribute('src', imagePath);
}