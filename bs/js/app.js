function add(a,b) {
    return a+b;
}
function sub(a,b) {
    if (a>b) {
        return a-b;
    }else{
        return b-a;
    }
    
}
function sum(nums) {
    var result = 0; 
    for (let i = 0; i < nums.length; i++) {
        result += nums[i];
    }
    return result;
    
}