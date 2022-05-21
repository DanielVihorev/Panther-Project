const draggables = document.querySelectorAll('.draggable')//sets the draggable query
const containers = document.querySelectorAll('.container')//set the containers to hold the draggable

//enables the item to be dragged
draggables.forEach(draggable => 
{
    draggable.addEventListener('dragstart' , () => { 
        //console.log('drag start') //prove it by starting dragging
        draggable.classList.add('dragging')
    })

    draggable.addEventListener('dragend' , () => {
        draggable.classList.remove('dragging')
    })
    
})

//let's the draggable item being placed in a new place
containers.forEach(container => 
{
    container.addEventListener('dragover' , e => {
        e.preventDefault() //lets the element stay placed in the new block
        const afterElement = getDragAfterElement (container , e.clientY ) //activates the funtion written below 
        const draggable = document.querySelector('.dragging') // activates the draggable function 

        //letting move the element above and below everything
        if(afterElement == null) {
            container.appendChild(draggable)
        }
        else {
            container.insertBefore(draggable,afterElement)
        }
        
    })

})

//the function is checks where the mouse is located
function getDragAfterElement(container , y )
{
    const draggableElements = [...container.querySelectorAll('.draggable:not(dragging)')]

    //takes 2 peremeter to reduce the cloesest one
    draggableElements.reduce ((closest, child) => {
        const box = child.getBoundingClientRect()
        const offset = y - box.top - box.height / 2 // calculates the offset
        //console.log(offset) // activates the box or offser while console is running
        if (offset < 0 && offset > closest.offset )
        {
            return { offset: offset , element: child  }
        }
        else 
        {
            return(closest)
        }
    } , { offset: Number.NEGATIVE_INFINITY } ).element // the function check where my mouse is found at the drag moment 
}