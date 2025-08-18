package Demo;
import java.util.Scanner;
public class Demo {
	public static void main(String[] args) {
		int a,b;
		int t=0;
		Scanner sc = new Scanner(System.in);{
			System.out.println("nhap a=");
			a = sc.nextInt();
			System.out.println("nhap b=");
			b = sc.nextInt();
			sc.close();
			for(int i = a; i <= b; i++) {
				if(i%3==0) {
					t = t+i;
				}
			}
		}
		System.out.println(t);
	}
}
