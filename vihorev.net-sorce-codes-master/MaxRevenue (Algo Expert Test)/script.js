function maxProfitWithKTransactions(prices, k) {
    // Write your code here.
      let priceThatBought 
      let priceThatSold
      let Profit 
      
      for(let j = k ; j-- ; j =0)
          {
              for(let i = 0 ; i++ ; i< prices.length )
              priceThatBought = prices[i];
              priceThatSold = prices.next;
              profit = Math.abs(priceThatBought - priceThatSold)
              console.log(`The profit of day ${$i} and day ${i+1} is ${profit}`)
          }
  }
  
  prices = [5 , 11 , 3 , 50 , 60 , 90 ]
  k = 2
  maxProfitWithKTransactions(prices, k)
  
  // Do not edit the line below.
  exports.maxProfitWithKTransactions = maxProfitWithKTransactions;
  