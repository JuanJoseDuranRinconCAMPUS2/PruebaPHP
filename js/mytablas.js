
function  QueryOptions() {
    const optionsTB = document.querySelectorall(".boards");
    optionsTB.forEach(option => option.addEventListener("click", (event) => {
        const optionId = event.currentTarget.id;
        console.log(optionId);
    }));
}

export default{
    QueryOptions
}