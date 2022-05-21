document.addEventListener("click",e => {
    let handle 
    if(e.target.matches(".handle")) {handle = e.target
    }else{
        handle = e.target.closest(".handle") 
    }
    if(handle != null) onHandleClick(handle)
})

const throttleProgressBar = throttle(() => {
    document.querySelectorAll(".progress-bar").forEach(claculateProgressBar)
}, 250)

window.addEventListener("resize", throttleProgressBar) 

function claculateProgressBar(progressBar){
    progressBar.innerHTML = ""
    const slider =  progressBar.closest(".row").querySelector(".slider")
    const itemCount = slider.children.length
    const itemsPerScrenn = parseInt(getComputedStyle(slider).getPropertyValue("--items-per-screen"))
    let sliderIndex = parseInt(getComputedStyle(slider).getPropertyValue("--slider-index"))
    // console.log(`There are ${itemsPerScrenn} Items Per Screen`)
    const progressBarItemcount = Math.ceil( itemCount / itemsPerScrenn) 
    
    if(sliderIndex >= progressBarItemcount){
        slider.style.setProperty("--slider-index", progressBarItemcount - 1 )
        sliderIndex = progressBarItemcount - 1
    }
    
    // console.log(`Item Count is ${itemCount}`)
    for (let i = 0 ;i<progressBarItemcount;i++){
        const barItem = document.createElement("div")
        barItem.classList.add("progress-item")
        if(i === sliderIndex){
            barItem.classList.add("active")
        }
        progressBar.append(barItem)
    }
}

function onHandleClick(handle)
{
    const progressBar = handle.closest(".row").querySelector(".progress-bar")
    const slider = handle.closest(".container").querySelector(".slider")
    const sliderIndex = parseInt(getComputedStyle(slider).getPropertyValue("--slider-index"))
    console.log(`Slider index is ${sliderIndex}`)

    // The const makes the slider return to the beggining 
    const progressBarItemcount = progressBar.children.length
    // The function handles the bar whiter preview when moved back and forth 
    if(handle.classList.contains("left-handle")){
        // The function makes the slider retune to the beggining
        if(sliderIndex - 1 < 0 ){
            slider.style.setProperty("--slider-index", progressBarItemcount - 1)
            progressBar.children[sliderIndex].classList.remove("active")
            progressBar.children[0].classList.add("active")
        }else {
            slider.style.setProperty("--slider-index", sliderIndex - 1)
            progressBar.children[sliderIndex].classList.remove("active")
            progressBar.children[progressBarItemcount - 1 ].classList.add("active")
        }
    }

    if(handle.classList.contains("right-handle")){
        // The function makes the slider retune to the beggining
        if(sliderIndex + 1 >= progressBarItemcount){
            slider.style.setProperty("--slider-index",0)
            progressBar.children[sliderIndex].classList.remove("active")
            progressBar.children[0].classList.add("active")
        }else {
            slider.style.setProperty("--slider-index", sliderIndex + 1)
            progressBar.children[sliderIndex].classList.remove("active")
            progressBar.children[sliderIndex + 1 ].classList.add("active")
        }
    }

    console.log(`slider is ${slider}`)
}

//checks if there is been a dealy between the the first and second call (search , progressbar update and etc.) , same as thread delay , wait etc in c++.
function throttle(cb, delay = 1000) {
    let shouldWait = false
    let waitingArgs
    const timeoutFunc = () => {
      if (waitingArgs == null) {
        shouldWait = false
      } else {
        cb(...waitingArgs)
        waitingArgs = null
        setTimeout(timeoutFunc, delay)
      }
    }
  
    return (...args) => {
      if (shouldWait) {
        waitingArgs = args
        return
      }
  
      cb(...args)
      shouldWait = true
      setTimeout(timeoutFunc, delay)
    }
  }