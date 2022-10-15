package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;

import java.util.HashSet;

public class ListAvailableBischopMoves extends ListAvailableMoves
{
    @Override
    public HashSet<Coords> list(Board board, Coords location) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        int x;
        int y;
        Coords coords = null;
        HashSet<Coords> availableMoves = new HashSet<>();
        for(int n = 0; n < 4; n++)
        {
            var piece = board.getPiece(location);
            x = location.x();
            y = location.y();
            moveLoop: for(int i = 0; i < 8; i++)
            {
                switch (n)
                {
                    //leftDown
                    case 0:
                        x--;
                        y--;
                        if(x < 1 || y < 1) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                    //rightDown
                    case 1:
                        x++;
                        y--;
                        if(x > 8 || y < 1) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                    //leftUp
                    case 2:
                        x--;
                        y++;
                        if(x < 1 || y > 8) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                    //rightUp
                    case 3:
                        x++;
                        y++;
                        if(x > 8 || y > 8) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                }
                if(!board.pieceOnField(coords) || isOppositePiece(board, board.getField(location).getPiece().getColor(), coords))
                {
                    availableMoves.add(coords);
                    if(isOppositePiece(board, board.getField(location).getPiece().getColor(), coords))
                    {
                        break;
                    }
                }
                else
                {
                    break;
                }
            }
        }
        return availableMoves;
    }
}