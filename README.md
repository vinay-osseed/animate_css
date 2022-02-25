# DESCRIPTION

Animate is an integration of animate.css, a bunch of cool, fun, and cross-browser animations for you to use in your projects.
Great for emphasis, home pages, sliders, and general just-add-water-awesomeness.

## Dependencies

Libraries
Animate in libraries/animate (can be downloaded from link [here](https://github.com/animate-css/animate.css/archive/refs/tags/3.7.2.zip)

## INSTALLATION AND CONFIGURATION

1. Install the module as usual.

2. Go to the path `admin/config/media/animate_css` or `Confuguration->Media->Animate CSS Setting` and select `Attachment Option`

3. If you selected `Local Library` then Download and ADD the library from [here](https://github.com/animate-css/animate.css/archive/refs/tags/3.7.2.zip) and unzip content in `PROJECT_ROOT/libraries/animate` folder.

## Module Usage

To animate an element, add the class `animated` to an element. You can include the class `infinite` for an infinite loop. Finally you need to add one of the following classes to the element:

| Class Name        |                    |                     |                      |
| ----------------- | ------------------ | ------------------- | -------------------- |
| `bounce`          | `flash`            | `pulse`             | `rubberBand`         |
| `shake`           | `headShake`        | `swing`             | `tada`               |
| `wobble`          | `jello`            | `bounceIn`          | `bounceInDown`       |
| `bounceInLeft`    | `bounceInRight`    | `bounceInUp`        | `bounceOut`          |
| `bounceOutDown`   | `bounceOutLeft`    | `bounceOutRight`    | `bounceOutUp`        |
| `fadeIn`          | `fadeInDown`       | `fadeInDownBig`     | `fadeInLeft`         |
| `fadeInLeftBig`   | `fadeInRight`      | `fadeInRightBig`    | `fadeInUp`           |
| `fadeInUpBig`     | `fadeOut`          | `fadeOutDown`       | `fadeOutDownBig`     |
| `fadeOutLeft`     | `fadeOutLeftBig`   | `fadeOutRight`      | `fadeOutRightBig`    |
| `fadeOutUp`       | `fadeOutUpBig`     | `flipInX`           | `flipInY`            |
| `flipOutX`        | `flipOutY`         | `lightSpeedIn`      | `lightSpeedOut`      |
| `rotateIn`        | `rotateInDownLeft` | `rotateInDownRight` | `rotateInUpLeft`     |
| `rotateInUpRight` | `rotateOut`        | `rotateOutDownLeft` | `rotateOutDownRight` |
| `rotateOutUpLeft` | `rotateOutUpRight` | `hinge`             | `jackInTheBox`       |
| `rollIn`          | `rollOut`          | `zoomIn`            | `zoomInDown`         |
| `zoomInLeft`      | `zoomInRight`      | `zoomInUp`          | `zoomOut`            |
| `zoomOutDown`     | `zoomOutLeft`      | `zoomOutRight`      | `zoomOutUp`          |
| `slideInDown`     | `slideInLeft`      | `slideInRight`      | `slideInUp`          |
| `slideOutDown`    | `slideOutLeft`     | `slideOutRight`     | `slideOutUp`         |
| `heartBeat`       |

Full example:

```html
<h1 class="animated infinite bounce delay-2s">Example</h1>
```

It's possible to change the duration of your animations, add a delay or change the number of times that it plays:

```css
.yourElement {
  animation-duration: 3s;
  animation-delay: 2s;
  animation-iteration-count: infinite;
}
```

## Usage with Javascript

You can do a whole bunch of other stuff with animate.css when you combine it with Javascript. A simple example:

```javascript
const element =  document.querySelector('.my-element')
element.classList.add('animated', 'bounceOutLeft')
```

You can also detect when an animation ends:

```javascript
const element =  document.querySelector('.my-element')
element.classList.add('animated', 'bounceOutLeft')

element.addEventListener('animationend', function() { doSomething() })
```

You can use this simple function to add and remove the animations:

```javascript
function animateCSS(element, animationName, callback) {
    const node = document.querySelector(element)
    node.classList.add('animated', animationName)

    function handleAnimationEnd() {
        node.classList.remove('animated', animationName)
        node.removeEventListener('animationend', handleAnimationEnd)

        if (typeof callback === 'function') callback()
    }

    node.addEventListener('animationend', handleAnimationEnd)
}
```

And use it like this:

```javascript
animateCSS('.my-element', 'bounce')

// or
animateCSS('.my-element', 'bounce', function() {
  // Do something after animation
})
```

Notice that the examples are using ES6's `const` declaration, dropping support for IE10 and some aging browsers. If you prefer, switch the `const` to `var` declarations and IE10 and some old browsers will get support (they still have to provide [classList](https://developer.mozilla.org/en-US/docs/Web/API/Element/classList) support, so do your [research](https://caniuse.com/#feat=classlist)).

## Setting _Delay_ and _Speed_

### Delay Class

It's possible to add delays directly on the element's class attribute, just like this:

```html
<div class="animated bounce delay-2s">Example</div>
```

| Class Name | Delay Time |
| ---------- | ---------- |
| `delay-2s` | `2s`       |
| `delay-3s` | `3s`       |
| `delay-4s` | `4s`       |
| `delay-5s` | `5s`       |

> _**Note**: The default delays are from 1 second to 5 seconds only. If you need custom delays, add it directly to your own CSS code._

### Slow, Slower, Fast, and Faster Class

It's possible to control the speed of the animation by adding these classes, as a sample below:

```html
<div class="animated bounce faster">Example</div>
```

| Class Name | Speed Time |
| ---------- | ---------- |
| `slow`     | `2s`       |
| `slower`   | `3s`       |
| `fast`     | `800ms`    |
| `faster`   | `500ms`    |

> _**Note**: The `animated` class has a default speed of `1s`. If you need custom duration, add it directly to your own CSS code._
