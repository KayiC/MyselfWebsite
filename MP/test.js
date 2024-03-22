const clearBtn = document.querySelector('#Clear');
const text = document.querySelector('#text');
const textarea = document.querySelector('#textarea');
const postBtn = document.querySelector('#Submit');

clearBtn.addEventListener('click',() => {
    if(confirm("Are you sure want to clear?")){
        text.value = '';
        textarea.value = '';
    }
});

postBtn.addEventListener('click', (e) => {
    if(text.value =='' || textarea.value ==''){
        if(text.value =='' && textarea.value ==''){
            text.style.background = '#ede6c4';
            textarea.style.background = '#ede6c4';
        }
        else if(text.value ==''){
            text.style.background = '#ede6c4';
            textarea.style.background = 'white';

        }
        else if(textarea.value ==''){
            textarea.style.background = '#ede6c4';
            text.style.background = 'white';
        }
        e.preventDefault();
    }
    else{
        text.style.background = 'white';
        textarea.style.background = 'white';
    }
})