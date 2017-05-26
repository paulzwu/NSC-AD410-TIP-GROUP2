var bardata = [50,60,70,10,100,15];//dummy data

var max = d3.max(bardata);//biggest number in bardata array


var height = 400,
	width = 600,
	barWidth = 50,
	barOffset = 5;

var tempColor;//to be used in "mouseover" below

var yScale = d3.scaleLinear()
    .domain([0, max])
    .range([0, height]);


var myChart = d3.select('#chart').append('svg')
    .attr('width', width)
    .attr('height', height)
	.style('background', '#C9D7D6')
    .selectAll('rect').data(bardata)
    .enter().append('rect')
    .style('fill', '#78d')
    //set width of rectangle bars
    .attr('width', barWidth)
    .attr('x', function (d,i) {
        return i * (barWidth + barOffset);
    })
    //scale the height of all bars to size of biggest data figure and fill height of graph
    .attr('height', function(d){
        return yScale(d);
    })
    .attr('y', function (d) {
        return height - yScale(d);
    })
    //when mouse hovers over graph change bar to yellow
    .on('mouseover', function(d){
    tempColor = this.style.fill;
    d3.select(this)
        .style('opacity',.5)
        .style('fill','yellow')
    })
    //when mouse isnt hovering over go back to blue color
    .on('mouseout',function(d){
        d3.select(this)
            .style('opacity',1)
            .style('fill', tempColor)
    });


//code below for axis isnt quite working yet
/*var xAxis = d3.svg.axis()
   .scale(yScale)
   .ticks(10);

var xGuide = d3.select('svg').append('g');
    xAxis(xGuide);
xGuide.attr('transform', 'translate(35,0)');**/