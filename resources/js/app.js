import './bootstrap';
import './read_file';
import { clickToTopic} from './link.js';

const clickToTopicElements = document.querySelectorAll('[hw-click-to-topic]')

for (let i = 0; i < clickToTopicElements.length; i++) {
    const element = clickToTopicElements[i]
    element.addEventListener('click', (event) => {
        const topicName = element.getAttribute('hw-click-to-topic')
        clickToTopic(topicName)
    })
}
