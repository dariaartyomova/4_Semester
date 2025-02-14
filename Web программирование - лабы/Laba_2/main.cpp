#include <iostream>
#include <cmath>

struct Point {
	// Поля
	int x;
	int y;
};

class RectPlus {
	int m_a, m_b, m_c;
public:
	RectPlus() = default;
	RectPlus(int a, int b, int c) 
	{
		setA(a);
		setB(b);
		setC(c);
	}

	void setA(int a)
	{
		if (a < 0)
			std::cout << "Negative A" << std::endl;
		m_a = a;
	}

	void setB(int b)
	{
		if (b < 0)
			std::cout << "Negative B" << std::endl;
		m_b = b;
	}

	void setC(int c)
	{
		if (c < 0)
			std::cout << "Negative C" << std::endl;
		m_c = c;
	}

	int Volume()
	{
		return m_a * m_b * m_c;
	}

	int square()
	{
		return 2*(m_a*m_b + m_a*m_c + m_b*m_c);
	}

	float diagpnal()
	{
		return sqrt(m_a * m_a + m_b * m_b + m_c * m_c);
	}

};

int main()
{
	RectPlus r;

	r.setA(1);
	r.setB(2);
	r.setC(3);
	std::cout << r.Volume() << std::endl;
	std::cout << r.square() << std::endl;
	std::cout << r.diagpnal() << std::endl;

	return 0;
}