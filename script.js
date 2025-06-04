function errorAlert() {
    let params = new URL(window.location.toString()).searchParams;
    let message = params.has("info") ? params.get("info") : null;
    console.log(message);
    if(message) {
        alert(message);
    }
}