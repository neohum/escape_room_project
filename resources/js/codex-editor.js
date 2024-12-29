import EditorJS from '@editorjs/editorjs'; 
import Header from '@editorjs/header';
import Link from '@editorjs/link';
import List from '@editorjs/list';
import SimpleImage from "@editorjs/simple-image";
import Embed from '@editorjs/embed';
import RawTool from '@editorjs/raw';
import Quote from '@editorjs/quote';

class MyTool {
  constructor({data, api}){
    this.api = api;
    // ...
  }
  save() {
    const savedData = this.api.saver.save(); // ...
  }

  openToolbar() {
    this.api.toolbar.open();

    // then do something else
  }
  // ... other methods
}

class MarkerTool {

    static get isInline() {
        return true;
    }

    constructor() {
        this.button = null;
        this.state = false;
    }

    render() {
        this.button = document.createElement('button');
        this.button.type = 'button';
        this.button.textContent = 'M';

        return this.button;
    }

    surround(range) {
        if (this.state) {
            // If highlights is already applied, do nothing for now
            return;
        }

        const selectedText = range.extractContents();

        // Create MARK element
        const mark = document.createElement('MARK');

        // Append to the MARK element selected TextNode
        mark.appendChild(selectedText);

        // Insert new element
        range.insertNode(mark);
    }

   
    checkState(selection) {
        const text = selection.anchorNode;

        if (!text) {
            return;
        }

        const anchorElement = text instanceof Element ? text : text.parentElement;
      
        this.state = !!anchorElement.closest('MARK');
    }

  renderSettings(){
  const wrapper = document.createElement('div');

  this.settings.forEach( tune => {
    let button = document.createElement('div');

    button.classList.add('cdx-settings-button');
    button.classList.toggle('cdx-settings-button--active', this.data[tune.name]);
    button.innerHTML = tune.icon;
    wrapper.appendChild(button);

    button.addEventListener('click', () => {
      this._toggleTune(tune.name);
      button.classList.toggle('cdx-settings-button--active');
    });

  });

  return wrapper;
}
  
  
}






const editor = new EditorJS({
  holder: 'editorjs',
  tools: {
    header: {
      class: Header,
      inlineToolbar: true,
      config: {
        placeholder: 'Enter a header',
        levels: [2, 3, 4],
        defaultLevel: 3,
      },
    },
    link: {
      class: Link,
      inlineToolbar: true,
    },

    image: SimpleImage,
    embed: {
      class: Embed,
      inlineToolbar: true,
    },
    raw: RawTool,
    quote: {
      class: Quote,
      inlineToolbar: true,
      config: {
        quotePlaceholder: 'Enter a quote',
        captionPlaceholder: 'Quote\'s author',
      },
    },
    list: {
      class: List,
      inlineToolbar: true,
    },


  type: 'html',
    element: document.createElement('div'),
  

    
  },
});

