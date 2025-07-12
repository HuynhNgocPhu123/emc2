// Create floating particles
function createParticles() {
    const particlesContainer = document.getElementById('particles');
    const particleCount = 50;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 6 + 's';
        particle.style.animationDuration = (Math.random() * 4 + 4) + 's';
        particlesContainer.appendChild(particle);
    }
}

createParticles();

const donutChart = document.querySelector('.donut-chart');
const segments = document.querySelectorAll('.donut-segment');
const legendPopup = document.getElementById('legendPopup');
const legendItems = document.querySelectorAll('.legend-item');
const centerValue = document.getElementById('centerValue');

// Info boxes and lines
const infoBoxes = {
    top: document.getElementById('info-top'),
    right: document.getElementById('info-right'),
    bottom: document.getElementById('info-bottom'),
    left: document.getElementById('info-left')
};

const connectingLines = {
    top: document.getElementById('line-top'),
    right: document.getElementById('line-right'),
    bottom: document.getElementById('line-bottom'),
    left: document.getElementById('line-left')
};

// Colors for each segment
const segmentColors = ['#ff6b9d', '#74b9ff', '#00b894', '#ffeaa7'];

let currentHoveredSegment = null;
let hideTimeout = null;
let isAnimating = false;

// Animate segments on load
function animateSegments() {
    segments.forEach((segment, index) => {
        setTimeout(() => {
            const currentOffset = parseFloat(segment.getAttribute('stroke-dashoffset'));
            const targetOffset = index === 0 ? 0 : 
                               index === 1 ? -187.1 : 
                               index === 2 ? -347.3 : -454.1;
            
            segment.style.strokeDashoffset = targetOffset;
            segment.style.transition = `stroke-dashoffset 1.5s cubic-bezier(0.4, 0, 0.2, 1)`;
        }, index * 300);
    });
}

// Start animation after a brief delay
setTimeout(animateSegments, 500);

// Hide all info boxes and lines
function hideAllInfoBoxes() {
    Object.values(infoBoxes).forEach(box => {
        box.classList.remove('visible');
    });
    Object.values(connectingLines).forEach(line => {
        line.classList.remove('visible');
    });
}

// Show info box for specific position
function showInfoBox(position, segmentIndex) {
    hideAllInfoBoxes();
    
    const infoBox = infoBoxes[position];
    const connectingLine = connectingLines[position];
    const color = segmentColors[segmentIndex];
    
    // Set border color and glow effect
    infoBox.style.borderColor = color;
    infoBox.style.boxShadow = `0 8px 24px rgba(0, 0, 0, 0.6), 0 0 30px ${color}60`;
    
    // Set line color and position
    connectingLine.style.background = `linear-gradient(90deg, ${color}, ${color}60)`;
    connectingLine.style.boxShadow = `0 0 20px ${color}60`;
    
    // Position and size the connecting line
    positionConnectingLine(position, connectingLine);
    
    // Show elements
    infoBox.classList.add('visible');
    connectingLine.classList.add('visible');
}

// Position connecting line based on info box position
function positionConnectingLine(position, line) {
    const chartRect = donutChart.getBoundingClientRect();
    const containerRect = document.querySelector('.chart-container').getBoundingClientRect();
    
    const chartCenterX = chartRect.left + chartRect.width / 2 - containerRect.left;
    const chartCenterY = chartRect.top + chartRect.height / 2 - containerRect.top;
    
    switch(position) {
        case 'top':
            line.style.left = chartCenterX + 'px';
            line.style.top = '50px';
            line.style.width = '3px';
            line.style.height = '100px';
            line.style.background = `linear-gradient(180deg, ${line.style.background.split(',')[0].split('(')[1]}, transparent)`;
            break;
        case 'right':
            line.style.right = '50px';
            line.style.top = chartCenterY + 'px';
            line.style.width = '100px';
            line.style.height = '3px';
            line.style.background = `linear-gradient(90deg, transparent, ${line.style.background.split(',')[0].split('(')[1]})`;
            break;
        case 'bottom':
            line.style.left = chartCenterX + 'px';
            line.style.bottom = '50px';
            line.style.width = '3px';
            line.style.height = '100px';
            line.style.background = `linear-gradient(180deg, transparent, ${line.style.background.split(',')[0].split('(')[1]})`;
            break;
        case 'left':
            line.style.left = '50px';
            line.style.top = chartCenterY + 'px';
            line.style.width = '100px';
            line.style.height = '3px';
            line.style.background = `linear-gradient(90deg, ${line.style.background.split(',')[0].split('(')[1]}, transparent)`;
            break;
    }
}

// Enhanced hover effects
donutChart.addEventListener('mouseenter', function() {
    clearTimeout(hideTimeout);
    legendPopup.classList.add('visible');
});

donutChart.addEventListener('mouseleave', function() {
    hideTimeout = setTimeout(() => {
        if (!legendPopup.matches(':hover')) {
            legendPopup.classList.remove('visible');
            hideAllInfoBoxes();
            centerValue.textContent = '95%';
        }
    }, 300);
});

legendPopup.addEventListener('mouseenter', function() {
    clearTimeout(hideTimeout);
});

legendPopup.addEventListener('mouseleave', function() {
    legendPopup.classList.remove('visible');
    hideAllInfoBoxes();
    centerValue.textContent = '95%';
});

// Enhanced segment interactions
segments.forEach((segment, index) => {
    segment.addEventListener('mouseenter', function() {
        if (isAnimating) return;
        
        const value = this.getAttribute('data-value');
        const label = this.getAttribute('data-label');
        const amount = this.getAttribute('data-amount');
        const position = this.getAttribute('data-position');
        
        // Update center content
        centerValue.textContent = value + '%';
        
        // Highlight legend item
        legendItems.forEach(item => item.classList.remove('active'));
        legendItems[index].classList.add('active');
        
        // Show info box at corresponding position
        showInfoBox(position, index);
        
        currentHoveredSegment = index;
        positionLegend();
    });
    
    segment.addEventListener('mouseleave', function() {
        currentHoveredSegment = null;
    });
    
    segment.addEventListener('click', function() {
        createEnhancedRipple(this, index);
        
        // Add pulse animation to center
        centerValue.style.animation = 'pulse 0.5s ease-in-out';
        setTimeout(() => {
            centerValue.style.animation = '';
        }, 500);
        
        // Log detailed info
        const label = this.getAttribute('data-label');
        const value = this.getAttribute('data-value');
        const amount = this.getAttribute('data-amount');
        console.log(`Đã chọn: ${label} - ${value}% (${amount})`);
    });
});

// Enhanced legend interactions
legendItems.forEach((item, index) => {
    item.addEventListener('mouseenter', function() {
        const value = segments[index].getAttribute('data-value');
        const position = segments[index].getAttribute('data-position');
        centerValue.textContent = value + '%';
        
        // Dim other segments
        segments.forEach((s, i) => {
            if (i !== index) {
                s.style.opacity = '0.3';
            } else {
                s.style.opacity = '1';
            }
        });
        
        // Show info box at corresponding position
        showInfoBox(position, index);
        
        this.classList.add('active');
    });
    
    item.addEventListener('mouseleave', function() {
        segments.forEach(s => s.style.opacity = '1');
        this.classList.remove('active');
        hideAllInfoBoxes();
        centerValue.textContent = '100%';
    });
});

function positionLegend() {
    const rect = donutChart.getBoundingClientRect();
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;
    
    legendPopup.style.left = (centerX + 100) + 'px';
    legendPopup.style.top = (centerY - 100) + 'px';
}

function createEnhancedRipple(element, index) {
    isAnimating = true;
    
    const ripple = document.createElement('div');
    ripple.className = 'ripple';
    
    const size = 120;
    ripple.style.width = size + 'px';
    ripple.style.height = size + 'px';
    ripple.style.left = '50%';
    ripple.style.top = '50%';
    ripple.style.marginLeft = -size/2 + 'px';
    ripple.style.marginTop = -size/2 + 'px';
    
    // Use segment color for ripple
    const colors = ['#ff6b9d', '#74b9ff', '#00b894', '#ffeaa7'];
    ripple.style.background = `radial-gradient(circle, ${colors[index]}40, transparent)`;
    
    donutChart.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
        isAnimating = false;
    }, 800);
}
function animateDonutSegment(circle, targetPercent, duration = 2000) {
  const radius = circle.getAttribute("r");
  const circumference = 2 * Math.PI * radius;
  const targetLength = circumference * (targetPercent / 100);

  let start = null;

  function animate(timestamp) {
    if (!start) start = timestamp;
    const progress = timestamp - start;
    const percent = Math.min(progress / duration, 1); // 0 → 1
    const currentLength = targetLength * percent;
    const remaining = circumference - currentLength;

    circle.setAttribute("stroke-dasharray", `${currentLength} ${circumference - currentLength}`);
    circle.setAttribute("stroke-dashoffset", "0");

    if (percent < 1) {
      requestAnimationFrame(animate);
    }
  }

  requestAnimationFrame(animate);
}

// Gọi sau khi DOM sẵn sàng
window.addEventListener("DOMContentLoaded", () => {
  const circle = document.querySelector(".donut-segment");
  animateDonutSegment(circle, 95); // chạy từ 0% đến 95%
});
