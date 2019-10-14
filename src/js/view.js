/*jshint esversion: 6 */

class view {
	constructor(name = '') {
    this.image = document.querySelectorAll('.' + name);

		this.beginEvent();
  }

  imageSize(target) {
    if (target.style.width < '250px') {
      target.style.width= '250px';
    } else {
      target.style.width = '15px';
    }
  }

	beginEvent() {
		for (let i = 0; i < this.image.length; i += 1) {
			this.image[i].addEventListener('click', (event) => {
        this.imageSize(this.image[i]);
				event.preventDefault();
			});
		}
	}
}

new view('table__view');