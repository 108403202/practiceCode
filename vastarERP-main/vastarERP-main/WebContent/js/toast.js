const Toast = {
    // 建構子
    init(){
        this.hideTimeout = null;
        
        this.el = document.createElement('div');
        this.el.className = 'toast';
        document.body.appendChild(this.el);
    },

    show(message, state){
        // function clearTimeout 使得每次呼叫show都是呼叫一個新的toast-message
        clearTimeout(this.hideTimeout);
        
        this.el.textContent = message;
        this.el.className = 'toast toast--visible';

        // 會給予對應的toast顏色風格
        if(state){ 
            this.el.classList.add(`toast--${state}`);
        }
        this.hideTimeout = setTimeout(() =>{
            this.el.classList.remove('toast--visible');
        }, 2000);

    },
    
    alert(message){
        // function clearTimeout 使得每次呼叫show都是呼叫一個新的toast-message
        clearTimeout(this.hideTimeout);

        this.el.textContent = message;
        this.el.className = 'toast--alert toast--visible';

        this.hideTimeout = setTimeout(() =>{
            this.el.classList.remove('toast--visible');
        }, 3000);
    }

}

document.addEventListener('DOMContentLoaded', () => Toast.init());