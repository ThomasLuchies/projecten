const s = document.getElementById('sText');
const m = document.getElementById('mText');
const l = document.getElementById('lText');
const xl = document.getElementById('xlText');
const fontWeight = "bolder";
let selectedSize = null;

s.addEventListener('click', () =>
{
    if(m.style.fontWeight == fontWeight)
    {
        m.style.fontWeight = "normal";
        s.style.fontWeight = fontWeight;
    }
    else if(l.style.fontWeight == fontWeight)
    {
        l.style.fontWeight = "normal";
        s.style.fontWeight = fontWeight;
    }
    else if(xl.style.fontWeight == fontWeight)
    {
        xl.style.fontWeight = "normal";
        s.style.fontWeight = fontWeight;
    }
    else if(s.style.fontWeight != fontWeight)
    {
        s.style.fontWeight = fontWeight;
    }
    selectedSize = "s";
});

m.addEventListener('click', () =>
{
    if(s.style.fontWeight == fontWeight)
    {
        s.style.fontWeight = "normal";
        m.style.fontWeight = fontWeight;
    }
    else if(l.style.fontWeight == fontWeight)
    {
        l.style.fontWeight = "normal";
        m.style.fontWeight = fontWeight;
    }
    else if(xl.style.fontWeight == fontWeight)
    {
        xl.style.fontWeight = "normal";
        m.style.fontWeight = fontWeight;
    }
    else if(m.style.fontWeight != fontWeight)
    {
        m.style.fontWeight = fontWeight;
    }
    selectedSize = "m";
});

l.addEventListener('click', () =>
{
    if(s.style.fontWeight == fontWeight)
    {
        s.style.fontWeight = "normal";
        l.style.fontWeight = fontWeight;
    }
    else if(m.style.fontWeight == fontWeight)
    {
        m.style.fontWeight = "normal";
        l.style.fontWeight = fontWeight;
    }
    else if(xl.style.fontWeight == fontWeight)
    {
        xl.style.fontWeight = "normal";
        l.style.fontWeight = fontWeight;
    }
    else if(l.style.fontWeight != fontWeight)
    {
        l.style.fontWeight = fontWeight;
    }
    selectedSize = "l";
});

xl.addEventListener('click', () =>
{
    if(s.style.fontWeight == fontWeight)
    {
        s.style.fontWeight = "normal";
        xl.style.fontWeight = fontWeight;
    }
    else if(m.style.fontWeight == fontWeight)
    {
        m.style.fontWeight = "normal";
        xl.style.fontWeight = fontWeight;
    }
    else if(l.style.fontWeight == fontWeight)
    {
        l.style.fontWeight = "normal";
        xl.style.fontWeight = fontWeight;
    }
    else if(xl.style.fontWeight != fontWeight)
    {
        xl.style.fontWeight = fontWeight;
    }
    selectedSize = "xl";
});