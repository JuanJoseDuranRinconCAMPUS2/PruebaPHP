
import metodos from "./metodos.js";
function  QueryOptions() {
    const optionsTB = document.querySelectorAll(".boards");
    optionsTB.forEach(option => option.addEventListener("click", (event) => {
        const optionId = event.currentTarget.id;
        metodos.getData(optionId);
    }));
}

export default{
    QueryOptions
}