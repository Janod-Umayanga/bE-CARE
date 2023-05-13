#include<iostream>
using namespace std; 

// Time Class 
class Time { 
	int hr, mins; 

public: 
	// Constructors 
	Time(int h, int m) : hr(h),mins(m){
	}
	
	Time() 
	{ 
		cout << "\nTime's Object Created"; 
	} 
	
	int Minute() 
	{ 
		int totalmin = (hr * 60) + mins; 
		return totalmin; 
	} 

	void show() 
	{ 
		cout << "Hour: " << hr << endl; 
		cout << "Minute : " << mins << endl; 
	} 
}; 

// Minutes Class 
class Minute { 
	int mins; 

public: 
	// Constructors 
	Minute() 
	{ 
		mins = 0; 
	} 
	void operator=(Time T) 
	{ 
		mins = T.Minute(); 
	} 

	void show() 
	{ 
		cout << "\nTotal Minute : " << mins << endl; 
	} 
}; 

int main() 
{ 
	int hour, mins; 
	hour = 3, mins = 40; 
	
	Time T1(hour,mins);
	T1.show();
	
	Minute M1;
		M1.show();
		
	M1=T1;
	M1.show();
} 

